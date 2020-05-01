using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;

namespace TechSupport1.ViewModels
{
    public class RegisterViewModel
    {
        [Required,MinLength(5)]
        public string Username { get; set; }
        [MinLength(5), Required, DataType(DataType.Password)]
        public string Password { get; set; }
        [Compare("Password"),DataType(DataType.Password)]
       [Display(Name ="Confirm Password")]
        public string ConfirmPassword { get; set; }
        [EmailAddress,Required]
        public string Email { get; set; }
    }
}