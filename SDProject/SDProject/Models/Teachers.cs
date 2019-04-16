using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data.Entity;
using System.ComponentModel.DataAnnotations.Schema;
using System.ComponentModel.DataAnnotations;

namespace SDProject.Models
{
    [Table("tblTeachers")]
   
    public class Teachers { 
        
        [Key]
        public int Tid { get; set;}
        public string Name { get; set; }
        public string Address { get; set; }
        public string Email { get; set; }
        public string subject { get; set; }
        public int Phone { get; set; }
        public int Catagory { get; set; }
        public string ImagePath { get; set; }
    }
}