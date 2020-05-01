using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(AddisUniversity.Startup))]
namespace AddisUniversity
{
    public partial class Startup
    {
        public void Configuration(IAppBuilder app)
        {
            ConfigureAuth(app);
        }
    }
}
