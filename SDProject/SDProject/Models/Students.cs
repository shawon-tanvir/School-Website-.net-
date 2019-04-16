using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;

namespace SDProject.Models
{
    public class Students
    {
        
        [Key]
        public int Stid { get; set; }
        public string FirstName { get; set; }
        public string LastName { get; set; }
        public string StudentId { get; set; }
        public DateTime Dob { get; set; }
        public int Sex { get; set; }
        public int Class { get; set; }
        public string Image { get; set; }
      
    }
}