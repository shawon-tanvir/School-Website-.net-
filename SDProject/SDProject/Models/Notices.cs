using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace SDProject.Models
{
    public class Notices
    {
        [Key]
        public int Nid { get; set; }
        public string Heading { get; set; }
        public string Description { get; set; }
    }
}