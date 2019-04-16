using SDProject.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace SDProject.Controllers
{
    public class Home1Controller : Controller
    {
        // GET: Home1

        private SchoolAdminContext db = new SchoolAdminContext();
        public ActionResult Index()
        {
            return View();
        }
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Profile(string submitbutton)
        {
            switch (submitbutton)
            {
                case "logout":
                    // delegate sending to another controller action
                    return (logout());
                case "show":
                    // call another action to perform the cancellation
                    return (show());
                default:
                    // If they've submitted the form without a submitButton, 
                    // just return the view again.
                    return (View());
            }
        }
        private ActionResult logout()
        {
            Session["fname"] = null;
            Session["lname"] = null;
            return RedirectToAction("Index");
        }


        private ActionResult show()
        {
            string Class = Request["Class"];
            int term = Convert.ToInt32(Request["term"]);
            Session["table"] = "true";
            return View(db.Results.Where(x => x.term == term && x.Class == Class && x.StudentId == Session["id"].ToString()).ToList());
        }
    }
}