using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using Microsoft.AspNet.Identity;
using Microsoft.AspNet.Identity.Owin;
using Microsoft.Owin.Security;
using Proyecto_Oscar_Tonny.Models;

namespace Proyecto_Oscar_Tonny
{
    public class Producto
    {
        public int id { get; set; }

        public String usuario { get; set; }

        public String nombre { get; set; }

        public String Descripcion { get; set; }

        public virtual ICollection<File> Fotos { get; set; }

        public String estado { get; set; }

        public DateTime fecha_registro { get; set; }

    }
}