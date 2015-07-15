using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using Proyecto_Oscar_Tonny;
using Proyecto_Oscar_Tonny.Models;
using System.Web.UI.WebControls;

namespace Proyecto_Oscar_Tonny.Controllers
{
    public class transaccionesController : Controller
    {
        private Proyecto_Oscar_TonnyContext db = new Proyecto_Oscar_TonnyContext();

        // GET: transacciones
        public ActionResult Index()
        {
            return View(db.transacciones.ToList());
        }

        // GET: transacciones/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            transacciones transacciones = db.transacciones.Find(id);
            if (transacciones == null)
            {
                return HttpNotFound();
            }
            return View(transacciones);
        }

        // GET: transacciones/Create
        public ActionResult Create()
        {
            List<Producto> ByOwner = new List<Producto>();
            List<Producto> All = new List<Producto>();
            ProductoesController p = new ProductoesController();
            ByOwner = p.OwnerProducts(User.Identity.Name);
            All = p.AllProducts(User.Identity.Name);

            if(User.Identity.IsAuthenticated)
            {
                DropDownList PorDueño = new DropDownList();
                DropDownList Todos = new DropDownList();
                foreach (var item in ByOwner)
                {
                    PorDueño.Items.Add(item.nombre);
                }
                foreach (var item in All)
                {
                    Todos.Items.Add(item.nombre);
                }
                ViewBag.ByOwnerList = ByOwner;
                ViewBag.ProductosAll = All;
                return View();
            }
            
            
            return RedirectToAction("Login", "Account");
        }

        // POST: transacciones/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "id,producto_ofrecido,producto_interes,estado")] transacciones transacciones)
        {
            transacciones.estado = "Pendiente";
            transacciones.fecha = DateTime.Today;

            if (ModelState.IsValid)
            {
                db.transacciones.Add(transacciones);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            return View(transacciones);
        }

        // GET: transacciones/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            transacciones transacciones = db.transacciones.Find(id);
            if (transacciones == null)
            {
                return HttpNotFound();
            }
            return View(transacciones);
        }

        // POST: transacciones/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "id,producto_interes,fecha")] transacciones transacciones)
        {
            if (ModelState.IsValid)
            {
                db.Entry(transacciones).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            return View(transacciones);
        }

        // GET: transacciones/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            transacciones transacciones = db.transacciones.Find(id);
            if (transacciones == null)
            {
                return HttpNotFound();
            }
            return View(transacciones);
        }

        // POST: transacciones/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            transacciones transacciones = db.transacciones.Find(id);
            db.transacciones.Remove(transacciones);
            db.SaveChanges();
            return RedirectToAction("Index");
        }

        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }
    }
}
