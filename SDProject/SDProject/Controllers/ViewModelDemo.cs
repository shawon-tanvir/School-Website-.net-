using SDProject.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace SDProject.Controllers
{
    public class ViewModelDemo
    {
        public List<Teachers> Principal { get; set; }
        public List<Teachers> Teacher { get; set; }
        public List<Teachers> Officials { get; set; }
        public List<Teachers> Librarian { get; set; }
    }
}