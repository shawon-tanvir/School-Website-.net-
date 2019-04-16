using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;

namespace SDProject.Models
{
    public class Subjects
    {
        [Key]
        public int Subid { get; set; }
        public string Name { get; set; }
    }
}