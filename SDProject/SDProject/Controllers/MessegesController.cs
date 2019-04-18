using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using SDProject.Models;

namespace SDProject.Controllers
{
    public class MessegesController : Controller
    {
        private SchoolAdminContext db = new SchoolAdminContext();

        // GET: Messeges
        public ActionResult Index()
        {
            return View(db.Messeges.ToList());
        }

        // GET: Messeges/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Messeges messeges = db.Messeges.Find(id);
            if (messeges == null)
            {
                return HttpNotFound();
            }
            return View(messeges);
        }

        // GET: Messeges/Create
        public ActionResult Create()
        {
            return View();
        }

        // POST: Messeges/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "Mid,FirstName,LastName,email,Phone,Messege,IsReleased")] Messeges messeges)
        {
            if (ModelState.IsValid)
            {
                db.Messeges.Add(messeges);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            return View(messeges);
        }

        // GET: Messeges/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Messeges messeges = db.Messeges.Find(id);
            if (messeges == null)
            {
                return HttpNotFound();
            }
            return View(messeges);
        }

        // POST: Messeges/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "Mid,FirstName,LastName,email,Phone,Messege,IsReleased")] Messeges messeges)
        {
            if (ModelState.IsValid)
            {
                db.Entry(messeges).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            return View(messeges);
        }

        // GET: Messeges/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Messeges messeges = db.Messeges.Find(id);
            if (messeges == null)
            {
                return HttpNotFound();
            }
            return View(messeges);
        }

        // POST: Messeges/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            Messeges messeges = db.Messeges.Find(id);
            db.Messeges.Remove(messeges);
            db.SaveChanges();
            return RedirectToAction("Index");
        }
        [HttpPost]
        public ActionResult AddNotice(Notices notices)
        {
            return RedirectToAction("Create", "Notices");
        }
       
        [HttpPost]
        public ActionResult AddResult(Notices notices)
        {
            return RedirectToAction("Create", "Results");
        }
        [HttpPost]
        public ActionResult AddStudent(Notices notices)
        {
            return RedirectToAction("Create", "Students");
        }
        [HttpPost]
        public ActionResult AddSubject(Notices notices)
        {
            return RedirectToAction("Create", "Subjects");
        }
        [HttpPost]
        public ActionResult AddTeacher(Notices notices)
        {
            return RedirectToAction("Create", "Teachers");
        }
        [HttpPost]
        public ActionResult Logout()
        {
            Session["fname"] = null;
            Session["lname"] = null;
            return RedirectToAction("Index","Home");
        }
       

        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }
    }
}
