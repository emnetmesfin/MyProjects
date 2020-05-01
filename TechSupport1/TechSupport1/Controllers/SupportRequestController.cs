using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using TechSupport1.ViewModels;

using System.Data.Entity;
using TechSupport1.Models;

namespace TechSupport1.Controllers
{
    public class SupportRequestController : Controller
    {
        private ApplicationDbContext db = new ApplicationDbContext();
       
        List<int> username;
        // GET: SupportRequest
        public ActionResult Index()
        {
            int userId = Convert.ToInt32(Session["UserId"]);
            
            if (userId == 0)
            {
                return RedirectToAction("Login", "Account");
            }
            
            var comments = db.Comments.Include(x => x.Replies).OrderByDescending(x=>x.CreatedOn).ToList();
            return View(comments);
        }
        [HttpPost]
        public ActionResult Search(string searchString)
        {
            int userId = Convert.ToInt32(Session["UserId"]);
            var comment = from com in db.Comments select com;
            if (userId == 0)
            {
                return RedirectToAction("Login", "Account");
            }
            if (!String.IsNullOrEmpty(searchString))
            {


                var commentList = comment.Where(com => com.Text.Contains(searchString)).Include(x => x.Replies).OrderByDescending(x => x.CreatedOn).ToList();
                return View(commentList);
            }
            var comments = db.Comments.Include(x => x.Replies).OrderByDescending(x => x.CreatedOn).ToList();
            return RedirectToAction("QuestionDetail");
        }
        //Post: SupportRequest/PostReply
        [HttpPost]
        public ActionResult PostReply(ReplyViewModel obj)
        {  
            int userId = Convert.ToInt32(Session["UserId"]);
            if (userId == 0) {
                return RedirectToAction("Login", "Account");
            }
            Reply reply = new Reply();
            reply.Text = obj.Reply;
            reply.CommentId = obj.CID;
            reply.UserId = userId;
            reply.CreatedOn = DateTime.Now;
            User user = new User();
            if (user.Id == userId) {
                user.Rank += 1;
            }
            db.Replies.Add(reply);
            
            db.SaveChanges();
            return RedirectToAction("QuestionDetail");
          
            
        }

        //Post: SupportRequest/PostComment
        [HttpPost]
        public ActionResult PostComment(string Comment)
        {
            int userId = Convert.ToInt32(Session["UserId"]);
            if (userId == 0)
            {
                return RedirectToAction("Login", "Account");
            }
            Comment comment = new Comment();
            comment.Text = Comment;
            comment.CreatedOn = DateTime.Now;
            comment.UserId = userId;
            db.Comments.Add(comment);
            db.SaveChanges();
            return RedirectToAction("Index");

        }
       
        [HttpGet]
        public ActionResult QuestionDetail(QuestionViewModel obj)
        {
            
            int userId = Convert.ToInt32(Session["UserId"]);

         
            if (userId == 0)
            {
                return RedirectToAction("Login", "Account");
            }
            var comments = db.Comments.Include(x => x.Replies).OrderByDescending(x => x.CreatedOn).ToList();
           
        
             
                    return View(comments);
                
                
            

           
        }
    
       
        public ActionResult Answer(int id)
        {

            var comment = db.Comments.Include(c=>c.Replies).SingleOrDefault(c => c.Id == id);
            int userId = Convert.ToInt32(Session["UserId"]);
            if (userId == 0)
            {
                return RedirectToAction("Login", "Account");
            }
            if (comment == null)
                return HttpNotFound();
            var viewModel = new QuestionViewModel
            {
                Comment = comment,
                Replies = db.Replies.ToList()
            };
          
            return View("Answer",viewModel);

        }
       
    }
}