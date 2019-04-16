using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Web;

namespace SDProject.Models
{
    public class SchoolAdminContext : DbContext
    {
        public DbSet<Teachers> Teachers { get; set; }
        public DbSet<Students> Students { get; set; }

        public DbSet<Messeges> Messeges { get; set; }

        public DbSet<Notices> Notices { get; set; }

        public DbSet<Subjects> Subjects { get; set; }

        public DbSet<Results> Results { get; set; }
        public DbSet<Login> Login { get; set; }
    }
}