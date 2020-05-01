using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using TechSupport1.Models;

namespace TechSupport1.ViewModels
{
    public class QuestionViewModel
    {

        public Comment Comment { get; set; }
        public ICollection<Reply> Replies { get; set; }
    }
}