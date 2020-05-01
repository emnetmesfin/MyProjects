using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.IO;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using TechSupport1.Models;
using TechSupport1.ViewModels;

namespace TechSupport1.Controllers
{
    public class UserController : Controller
    { 
        private ApplicationDbContext db=new ApplicationDbContext();
        // GET: User
        
        public ActionResult Userprofile()
        {
            int userId = Convert.ToInt32(Session["UserId"]);
            if (userId == 0) {
                return RedirectToAction("Login", "Account");
            }
           
            return View(db.Users.Find(userId));
        }
        //Post:User/UpdatePicture
        [HttpPost]
        public ActionResult UpdatePicture(PictureViewModel obj) {
            int userId = Convert.ToInt32(Session["UserId"]);
            if (userId == 0) {
                return RedirectToAction("Login", "Account");
            }
            var file = obj.Picture;
           
            User user = db.Users.Find(userId);
            if (file != null) {
                var extension = Path.GetExtension(file.FileName);
                string id_and_extension = userId + extension;
                string imageUrl = "~/Profile Images/" + id_and_extension;
                user.ImageUrl = imageUrl;
                db.Entry(user).State = EntityState.Modified;
                db.SaveChanges();
                var path = Server.MapPath("~/Profile Images/");
                if (!Directory.Exists(path)) {
                    Directory.CreateDirectory(path);
                }
                if ((System.IO.File.Exists(path + id_and_extension))) {
                    System.IO.File.Delete(path + id_and_extension);
                }
                file.SaveAs((path + id_and_extension));
            }
            return RedirectToAction("UserProfile");


        }
       
    }
}