using SDProject.Models;
using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Reflection;
using System.Web;
using System.Web.Mvc;

namespace SDProject.Controllers
{
    
    public class HomeController : Controller
    {
        private SchoolAdminContext db = new SchoolAdminContext();
        // GET: Home
        public ActionResult Index()
        {

            return View();
        }
        public ActionResult About()
        {
            return View();
        }
        public ActionResult LoginForm()
        {
            return View();
        }
        public ActionResult Contact()
        {
            return View();
        }
        
        public ActionResult NoticeBoard()
        {
            //if (db.Notices.Any(s => s.) { }
            //var res = db.Notices.SqlQuery("SELECT * FROM Notices WHERE Nid=(SELECT max(Nid) FROM Notices)").ToList();
            //int lastid = Convert.ToInt32(res.);
            Notices max = db.Notices.OrderByDescending(p => p.Nid).FirstOrDefault();

            Notices min= db.Notices.OrderBy(p => p.Nid).FirstOrDefault();
            Session["noticefirst"] = min.Nid;
            Session["noticelast"] = max.Nid;
            Session["keeplast"] = max.Nid;
            Session["notice"] = max.Description;

            //ViewBag.res = res;
            return View();
        }
        public ActionResult Academics()
        {
            
            ViewModelDemo vmDemo = new ViewModelDemo();
            vmDemo.Principal = db.Teachers.SqlQuery("Select * from tblTeachers where Catagory=1").ToList();
            vmDemo.Teacher = db.Teachers.SqlQuery("Select * from tblTeachers where Catagory=2").ToList();
            vmDemo.Officials = db.Teachers.SqlQuery("Select * from tblTeachers where Catagory=3").ToList();
            vmDemo.Librarian = db.Teachers.SqlQuery("Select * from tblTeachers where Catagory=4").ToList();
            return View(vmDemo);
        }




        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Contact([Bind(Include = "Mid,FirstName,LastName,email,Phone,Messege")] Messeges messeges)
        {
            if (string.IsNullOrEmpty(Request["firstname"]) || string.IsNullOrEmpty(Request["lastname"]))
            {
                ModelState.AddModelError("Firstname", "Both Firstname and Lastname fields are required");
            }
            if (string.IsNullOrEmpty(Request["email"]))
            {
                ModelState.AddModelError("Email", "The Email field is required");
            }

            if (string.IsNullOrEmpty(Request["phone"]))
            {
                ModelState.AddModelError("Phone", "Phone Number is required");
            }
            if (string.IsNullOrEmpty(Request["messege"]))
            {
                ModelState.AddModelError("Messege", "The Message field is required");
            }

            if (ModelState.IsValid)
            {
                db.Messeges.Add(messeges);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            return View(messeges);
        }




        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult LoginForm(Login login)
        {
            string email = Request["email"].ToString();
            Console.WriteLine(email);
            string password = Request["signUpPassword"].ToString();
            Console.WriteLine(password);
            Login lo = new Login();
            


            if (db.Login.Any(s => s.email == email))
            {
                if (db.Login.Any(s => s.password == password))
                {
                    var lot = db.Login.First(a => a.email==email);
                    Session["id"] = lot.StudentId;


                    string sid = Session["id"].ToString();
                    if (db.Students.Any(s => s.StudentId == sid))
                    {
                        var s1 = db.Students.First(s => s.StudentId == sid);
                        Session["fname"] = s1.FirstName;
                        Session["lname"] = s1.LastName;
                        Session["dob"] = s1.Dob.ToString("dd/MM/yyyy");
                        if (s1.Sex == 1)
                        {
                            Session["sex"] = "Male";
                        }
                        else
                            Session["sex"] = "Female";
                        Session["class"] = s1.Class;
                        //view
                        Session["image"]= s1.Image;
                        ViewData["image"] = s1.Image;
                        ViewBag.imagepath = s1.Image;
                        Session["table"] = "false";

                        Console.WriteLine("Check1");
                    }
                    Console.WriteLine("Check2");
                    if (Session["fname"].Equals("admin"))
                    {
                        return RedirectToAction("Create", "Messeges");
                    }
                    else
                    {
                        return View("Profile");
                    }
                }
                else
                {
                    ModelState.AddModelError("password", "Password Incorrect");
                    return View();
                }
            }
            else
            {
                ModelState.AddModelError("email", "Email not found or matched");
                return View();
            }
           
        }

        public ActionResult SignUpPage()
        {
            return View();
        }
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult SignUpPage([Bind(Include = "Lid,FirstName,LastName,StudentId,email,password,Confirmation")] Login login)
        {
            /*if (string.IsNullOrEmpty(Request["firstname"]) ||
                string.IsNullOrEmpty(Request["lastname"]) ||
                string.IsNullOrEmpty(Request["email"]) ||
                string.IsNullOrEmpty(Request["sid"]) ||
                string.IsNullOrEmpty(Request["password"]) ||
                string.IsNullOrEmpty(Request["confirmation"])
                )
            {
                ModelState.AddModelError("Firstname", "All the fields are required");
                return View();
            }*/
            
                if (Request["password"].ToString() == Request["confirmation"].ToString())
                {
                    //LoginForm loginform;
                    if (ModelState.IsValid)
                    {
                        db.Login.Add(login);
                        db.SaveChanges();
                        return RedirectToAction("LoginForm");
                    }

                    return View(login);
                }
                else
                {
                    ModelState.AddModelError("Firstname", "Password Not Matched");
                    return View();
                }
            
        }
        public ActionResult Profile()
        {
            Session["table"] = "false";
            if (Session["fname"] == null)
            {
                return View("LoginForm");
            }
            else if (Session["fname"].Equals("admin"))
            {
                return RedirectToAction("Index", "Messeges");
            }
            return View();
        }



        //Profile
        [HttpPost]
        public ActionResult Logout(Results results)
        {
            Session["fname"] = null;
            Session["lname"] = null;
            return RedirectToAction("Index");
        }

        [HttpPost]
        public ActionResult Show(Results results)
        {
            string Class = Request["Class"];
            int term = Convert.ToInt32(Request["term"]);
            Session["table"] = "true";
            var res = db.Results.SqlQuery("Select * from Results where Class='"+Class+"' and term='"+term+"' and StudentId='"+Session["id"]+"'").ToList();
            ViewBag.res = res;
            return View("Profile",res);
        }
        

        [HttpPost]
        public ActionResult NextButton(Notices notices)
        {

            int keep = Convert.ToInt32(Session["keeplast"]);
            int lastid = Convert.ToInt32(Session["noticelast"]);
            if (lastid < keep)
            {
                Notices check = db.Notices.First(a => a.Nid == lastid + 1);

                if (check.Description != null)
                {
                    Session["noticelast"] = lastid + 1;
                    Session["notice"] = check.Description;
                }
            }

            return View("NoticeBoard");
        }

        [HttpPost]
        public ActionResult PreviousButton(Notices notices)
        {
            
            int firstid= Convert.ToInt32(Session["noticefirst"]);
            int lastid = Convert.ToInt32(Session["noticelast"]);
            if (lastid > firstid)
            {
                Notices check = db.Notices.First(a => a.Nid == lastid - 1);

                if (check.Description != null)
                {
                    Session["noticelast"] = lastid - 1;
                    Session["notice"] = check.Description;
                }
            }
          
            return View("NoticeBoard");
        }




    }
}