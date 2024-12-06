/*
NILAY DAV NATH
TOPIC - PROJECT For Money Tracker  (USING TEXT FILE)
DATE - 12/12/2024
DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING
*/
#include <iostream>
#include <fstream>
#include <vector>
#include <sstream>
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
        cout << "Product Price   : " << fixed << setprecision(2) << price << endl;
        cout << "Revenue         : " << fixed << setprecision(2) << revenue << endl;
        cout << "Description     : " << description << endl;
    }
};

vector<Product> loadProductData(const string& filename) {
    vector<Product> products;
    ifstream file(filename);

    if (!file) {
        cerr << "Error: Unable to open file " << filename << endl;
        return products;
    }

    string line, name, description;
    double price, revenue;
    while (getline(file, line)) {
        stringstream ss(line);
        getline(ss, name, ',');
        ss >> price;
        ss.ignore();
        ss >> revenue;
        ss.ignore();
        getline(ss, description);
        products.emplace_back(name, price, revenue, description);
    }

    return products;
}

int main() {
    const string filename = "products.txt";
    vector<Product> products = loadProductData(filename);

    if (products.empty()) {
        cout << "No product data available." << endl;
        return 0;
    }

    cout << "\n=== PRODUCT INFORMATION ===\nAvailable Products:" << endl;
    for (const auto& product : products) {
        cout << "- " << product.getName() << endl;
    }

    cout << "\nEnter the product name to view details: ";
    string userInput;
    getline(cin,userInput);

    for (const auto& product : products) {
        if (product.getName() == userInput) {
            product.displayDetails();
            return 0;
        }
    }

    cout << "Product \"" << userInput << "\" not found." << endl;
    return 0;
}
