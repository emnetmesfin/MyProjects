﻿using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace TechSupport1.ViewModels
{
    public class PictureViewModel
    {
        [Required]
        public HttpPostedFileWrapper Picture { get; set; }
    }
}