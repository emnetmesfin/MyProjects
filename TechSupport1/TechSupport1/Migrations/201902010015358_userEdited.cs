namespace TechSupport1.Migrations
{
    using System;
    using System.Data.Entity.Migrations;
    
    public partial class userEdited : DbMigration
    {
        public override void Up()
        {
            AlterColumn("dbo.Users", "Rank", c => c.Int(nullable: true));
        }
        
        public override void Down()
        {
            AlterColumn("dbo.Users", "Rank", c => c.String());
        }
    }
}
