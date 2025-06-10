using System.Diagnostics;
using Microsoft.AspNetCore.Mvc;
using TodoApp.Models;

namespace TodoApp.Controllers;

public class HomeController : Controller
{
    private readonly ILogger<HomeController> _logger;
    private readonly AppDbContext _context;

    public HomeController(ILogger<HomeController> logger, AppDbContext context)
    {
        _logger = logger;
        _context = context;
    }


    public async Task<IActionResult> Index()
    {

        try {
            var dbConnected = await _context.Database.CanConnectAsync();
            ViewBag.DbConnected = dbConnected;
            _logger.LogInformation("Database connection status: {DbConnected}", dbConnected);
            return View();
        } catch (Exception ex) {
            _logger.LogError(ex, "Error checking database connection");
            ViewBag.DbConnected = false;
            ViewBag.ErrorMessage = "Database connection failed. Please check your connection string.";
        }

      
        return View();
    }

    public IActionResult Privacy()
    {
        return View();
    }

    [ResponseCache(Duration = 0, Location = ResponseCacheLocation.None, NoStore = true)]
    public IActionResult Error()
    {
        return View(new ErrorViewModel { RequestId = Activity.Current?.Id ?? HttpContext.TraceIdentifier });
    }
}
