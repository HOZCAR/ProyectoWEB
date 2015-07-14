namespace Proyecto_Oscar_Tonny.Migrations
{
    using System;
    using System.Data.Entity.Migrations;
    
    public partial class InitialCreate : DbMigration
    {
        public override void Up()
        {
            CreateTable(
                "dbo.Productoes",
                c => new
                    {
                        id = c.Int(nullable: false, identity: true),
                        nombre = c.String(),
                        Descripcion = c.String(),
                        foto = c.String(),
                        fecha_registro = c.DateTime(nullable: false),
                    })
                .PrimaryKey(t => t.id);
            
            CreateTable(
                "dbo.transacciones",
                c => new
                    {
                        id = c.Int(nullable: false, identity: true),
                        producto_interes = c.String(),
                        fecha = c.DateTime(nullable: false),
                        producto_ofrecido_id = c.Int(),
                    })
                .PrimaryKey(t => t.id)
                .ForeignKey("dbo.Productoes", t => t.producto_ofrecido_id)
                .Index(t => t.producto_ofrecido_id);
            
            CreateTable(
                "dbo.Usuarios",
                c => new
                    {
                        id = c.Int(nullable: false, identity: true),
                        nombre_completo = c.String(),
                        correo = c.String(),
                        pass = c.String(),
                        telefono = c.Int(nullable: false),
                        edad = c.Int(nullable: false),
                    })
                .PrimaryKey(t => t.id);
            
        }
        
        public override void Down()
        {
            DropForeignKey("dbo.transacciones", "producto_ofrecido_id", "dbo.Productoes");
            DropIndex("dbo.transacciones", new[] { "producto_ofrecido_id" });
            DropTable("dbo.Usuarios");
            DropTable("dbo.transacciones");
            DropTable("dbo.Productoes");
        }
    }
}
