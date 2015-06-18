using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Proyecto_Oscar_Tonny
{
    public class Producto
    {
        public int id { get; set; }

        public String nombre { get; set; }

        public String Descripcion { get; set; }

        public String foto { get; set; }

        public enum estado { Inactivo, Activo, Transacción, Cambiado }

        public DateTime fecha_registro { get; set; }

    }
}