using Microsoft.EntityFrameworkCore;


namespace TodoApp.Models;

public class AppDbContext : DbContext {
    public AppDbContext(DbContextOptions<AppDbContext> options) : base(options) {
    }

    public DbSet<TodoItemModel> TodoItems { get; set; }
}