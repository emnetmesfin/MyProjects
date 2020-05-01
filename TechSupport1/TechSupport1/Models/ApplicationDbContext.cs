using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Web;

namespace TechSupport1.Models
{
    public class ApplicationDbContext:DbContext
    {
        public ApplicationDbContext() : base("TechSupportDB") {

        }  
        public DbSet<User> Users { get; set; }
        public DbSet<Reply> Replies { get; set; }
        public DbSet<Comment> Comments { get; set; }

    } 

}