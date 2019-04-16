using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;

namespace SDProject.Models
{
    public class Results
    {
        [Key]
        public int Rid { get; set; }
        public int Marks { get; set; }
        public string Class { get; set; }
        public int term { get; set; }
        public string Grade { get; set; }
        public string Subject { get; set; }
        public string StudentId { get; set; }
    }
}