using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using TechSupport1.Models;
using TechSupport1.ViewModels;


namespace TechSupport1.Controllers
{
    public class AccountController : Controller
    {
        private ApplicationDbContext db = new ApplicationDbContext();
        // GET: Account/Register
        [HttpGet]
        public ActionResult Register()
        {
            return View();
        }
        // POST: Account/Register
        [HttpPost]
        public ActionResult Register(RegisterViewModel obj)
        {
            bool UserExists = db.Users.Any(x => x.Username == obj.Username);
            if (UserExists) {
                ViewBag.UsernameMessage = "This username is already in use,try another";
                return View();
            }
            bool EmailExists = db.Users.Any(y => y.Email == obj.Email);
            if (EmailExists) {
                ViewBag.EmailMessage = "This Email is already in use,try another";
                return View();
            }
            User user = new User();
            user.Username = obj.Username;
            user.Password = obj.Password;
            user.Email = obj.Email; 
            user.ImageUrl = "";
            user.CreatedOn = DateTime.Now;
            user.Rank = 0;
            db.Users.Add(user);
            db.SaveChanges();
            return RedirectToAction("Index","SupportRequest");
        }
        // GET: Account/Login
        [HttpGet]
        public ActionResult Login()
        {
            return View();
        }
        // POST: Account/Login
        [HttpPost]
        public ActionResult Login(LoginViewModel obj)
        {
            User user = new User();

            bool exists = db.Users.Any(u => u.Username == obj.Username && u.Password == obj.Password);
            if (exists) {
                Session["Rank"] = db.Users.Single(x => x.Username == obj.Username).Rank;
                Session["UserId"]=db.Users.Single(x=>x.Username==obj.Username).Id;
                Session["ImageUrl"] = db.Users.Single(x => x.Username == obj.Username).ImageUrl;
                return RedirectToAction("Index", "SupportRequest");
            }
            ViewBag.Message = "Invaild credentials!";
            return View();
        }
        // GET: Account/Logout
        [HttpGet]
        public ActionResult Logout()
        {
            Session["UserId"] = 0;
            return RedirectToAction("Index", "Home");
        }
        
    }
}