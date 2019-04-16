using SDProject.Models;
using System;
using System.Collections.Generic;
using System.Data.Entity.Infrastructure;
using System.IO;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace SDProject.Controllers
{
    public class ImageSaveController : Controller
    {
        [HttpGet]
        public ActionResult Add()
        {
            return View();
        }
        public ActionResult Add(ImageSave imageModel)
        {
            string filename = Path.GetFileNameWithoutExtension(imageModel.ImageFile.FileName);
            string extension= Path.GetExtension(imageModel.ImageFile.FileName);
            filename = filename + DateTime.Now.ToString("yymmssfff") + extension;
            imageModel.ImagePath = "~/Image/" + filename;
            filename = Path.Combine(Server.MapPath("~/Image/"),filename);
            imageModel.ImageFile.SaveAs(filename);
            using(SchoolImageEntities db =new SchoolImageEntities() )
            {
                db.ImageSaves.Add(imageModel);
                db.SaveChanges();
              
            }
            ModelState.Clear();
            return View();
        }
    }
}