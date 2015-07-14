using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Proyecto_Oscar_Tonny
{
    public class transacciones
    {
        public int id { get; set; }

        public Producto producto_ofrecido { get; set; }

        public Producto producto_interes { get; set; }

        public DateTime fecha { get; set; }

        public enum estado { Pendiente, Completado, Cancelado }
    }
}