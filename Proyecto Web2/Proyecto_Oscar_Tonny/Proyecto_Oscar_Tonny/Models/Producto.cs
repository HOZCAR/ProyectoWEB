using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using Microsoft.AspNet.Identity;
using Microsoft.AspNet.Identity.Owin;
using Microsoft.Owin.Security;

namespace Proyecto_Oscar_Tonny
{
    public class Producto
    {
        public int id { get; set; }

        //public ApplicationUser usuario { get; set; }

        public String nombre { get; set; }

        public String Descripcion { get; set; }

        public String foto { get; set; }

        public String estado { get; set; }

        public DateTime fecha_registro { get; set; }

    }
}