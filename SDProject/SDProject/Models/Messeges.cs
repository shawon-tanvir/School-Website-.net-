using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace SDProject.Models
{
    public class Messeges
    {
        [Key]
        public int Mid { get; set; }
        public string FirstName { get; set; }
        public string LastName { get; set; }
        public string email { get; set; }
        public int Phone { get; set; }
        public string Messege { get; set; }
        public Boolean IsReleased { get; set; } = false;
    }
}