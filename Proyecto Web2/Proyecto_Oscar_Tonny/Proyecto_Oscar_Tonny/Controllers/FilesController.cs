using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using Proyecto_Oscar_Tonny.Models;

namespace Proyecto_Oscar_Tonny.Controllers
{
    public class FilesController : Controller
    {
        private Proyecto_Oscar_TonnyContext db = new Proyecto_Oscar_TonnyContext();

        // GET: File
        public ActionResult Index(int id)
        {
            var fileToRetrieve = db.Files.Find(id);
            return File(fileToRetrieve.Content, fileToRetrieve.ContentType);
        }

    }
}
