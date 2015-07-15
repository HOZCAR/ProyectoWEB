using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Web;

namespace Proyecto_Oscar_Tonny.Models
{
    public class Proyecto_Oscar_TonnyContext : DbContext
    {
        // You can add custom code to this file. Changes will not be overwritten.
        // 
        // If you want Entity Framework to drop and regenerate your database
        // automatically whenever you change your model schema, please use data migrations.
        // For more information refer to the documentation:
        // http://msdn.microsoft.com/en-us/data/jj591621.aspx
    
        public Proyecto_Oscar_TonnyContext() : base("name=Proyecto_Oscar_TonnyContext")
        {
        }

 

        public System.Data.Entity.DbSet<Proyecto_Oscar_Tonny.Producto> Productoes { get; set; }

        public System.Data.Entity.DbSet<Proyecto_Oscar_Tonny.transacciones> transacciones { get; set; }
    
    }
}
