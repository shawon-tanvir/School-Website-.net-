using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace SDProject.Models
{
    public class Login
    {
        [AllowHtml]
        [Key]
        public int Lid { get; set; }
        public string FirstName { get; set; }
        public string LastName { get; set; }
        public string StudentId { get; set; }
        public string email { get; set; }
        public string password{ get; set; }
        public string Confirmation { get; set; }
    }
}