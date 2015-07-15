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

namespace Proyecto_Oscar_Tonny.Controllers
{
    public class ProductoesController : Controller
    {
        private Proyecto_Oscar_TonnyContext db = new Proyecto_Oscar_TonnyContext();

        // GET: Productoes
        public ActionResult Index()
        {
            return View(db.Productoes.ToList());
        }

        // GET: Productoes/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Producto producto = db.Productoes.Find(id);
            if (producto == null)
            {
                return HttpNotFound();
            }
            return View(producto);
        }

        // GET: Productoes/Create
        public ActionResult Create()
        {
            if (User.Identity.IsAuthenticated)
            {
                return View();
            }
            return RedirectToAction("Login", "Account");
        }

        // POST: Productoes/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "id,usuario,nombre,Descripcion,fecha_registro")] HttpPostedFileBase fileimg, Producto producto)
        {
            try
            {
                var avatar = new File
                {
                    FileName = System.IO.Path.GetFileName(fileimg.FileName),
                    FileType = FileType.foto,
                    ContentType = fileimg.ContentType
                };
                using (var reader = new System.IO.BinaryReader(fileimg.InputStream))
                {
                    avatar.Content = reader.ReadBytes(fileimg.ContentLength);
                }
                producto.Fotos = new List<File> { avatar };

                if (ModelState.IsValid)
                {
                    producto.fecha_registro = System.DateTime.Today;
                    producto.usuario = User.Identity.Name;
                    producto.estado = "Activo";
                    db.Productoes.Add(producto);
                    db.SaveChanges();
                    return RedirectToAction("Index");
                }

            }
            catch
            {
                return View(producto);
            }

            return View(producto);
        }

        // GET: Productoes/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Producto producto = db.Productoes.Find(id);
            if (producto == null)
            {
                return HttpNotFound();
            }
            if (User.Identity.IsAuthenticated && producto.usuario == User.Identity.Name)
            {
                return View(producto);
            }
            return RedirectToAction("Login", "Account");

        }

        // POST: Productoes/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "id,usuario,nombre,Descripcion,foto,fecha_registro")] Producto producto)
        {
            if (ModelState.IsValid)
            {
                db.Entry(producto).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            return View(producto);
        }

        // GET: Productoes/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Producto producto = db.Productoes.Find(id);
            if (producto == null)
            {
                return HttpNotFound();
            }
            return View(producto);
        }

        // POST: Productoes/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            Producto producto = db.Productoes.Find(id);
            db.Productoes.Remove(producto);
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
