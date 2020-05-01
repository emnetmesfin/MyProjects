namespace TechSupport1.Migrations
{
    using System;
    using System.Data.Entity.Migrations;
    
    public partial class User : DbMigration
    {
        public override void Up()
        {
            AddColumn("dbo.Users", "Rank", c => c.String());
        }
        
        public override void Down()
        {
            DropColumn("dbo.Users", "Rank");
        }
    }
}
