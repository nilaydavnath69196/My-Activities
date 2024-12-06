/*
NILAY DAV NATH
TOPIC - PROJECT For Money Tracker  (USING TEXT FILE)
DATE --------
DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING
*/

#include <iostream>
#include <vector>
#include <iomanip>
using namespace std;

class Product {
    string name, description;
    double price, revenue;

public:
    Product(string n, double p, double r, string d) : name(n), price(p), revenue(r), description(d) {}

    string getName() const { return name; }
    void displayDetails() const {
        cout << "----------------------------------------" << endl;
        cout << "Product Name    : " << name << endl;
        cout << "Product Price   : $" << fixed << setprecision(2) << price << endl;
        cout << "Revenue         : $" << fixed << setprecision(2) << revenue << endl;
        cout << "Description     : " << description << endl;
        cout << "----------------------------------------" << endl;
    }
};

int main() {
    // List of products stored directly in the C++ file
    vector<Product> products = {
        {"Laptop", 80000.50, 3000.00, "High-performance laptop for work and gaming."},
        {"Smartphone", 50000.00, 4000.00, "Latest model with advanced features."},
        {"Tablet", 30000.00, 2000.00, "Portable tablet for on-the-go use."},
        {"Headphones", 5000.00, 500.00, "Noise-cancelling headphones."},
        {"Smartwatch", 3000.00, 500.00, "Stylish smartwatch with health tracking."},
        {"Keyboard", 3000.00, 600.00, "Mechanical keyboard for gamers."},
        {"Mouse", 2000.00, 400.00, "Wireless mouse with ergonomic design."},
        {"Monitor", 25000.00, 2000.00, "4K Ultra HD monitor."},
        {"Printer", 20000.00, 3000.00, "All-in-one printer for home use."},
        {"Router", 6000.00, 1500.00, "High-speed WiFi router for seamless connectivity."}
    };

    cout << "\n=== PRODUCT INFORMATION ===\nAvailable Products:" << endl;
    for (const auto& product : products) {
        cout << "-" << product.getName() << endl; // Display product names without leading spaces
    }

    cout << "\nEnter the product name to view details: ";
    string userInput;
    getline(cin, userInput);

    for (const auto& product : products) {
        if (product.getName() == userInput) {
            product.displayDetails();
            return 0;
        }
    }

    cout << "Product \"" << userInput << "\" not found." << endl;
    return 0;
}

