#include <iostream>
#include <fstream>
#include <string>
#include <vector>
#include <sstream>
using namespace std;
class Product {
private:
     string name;
     string price;
     string warranty;
     string properties;

public:
    // Constructor to initialize product data
    Product(const  string& name, const  string& price, const  string& warranty, const  string& properties)
        : name(name), price(price), warranty(warranty), properties(properties) {}

    // Static method to load products from a file
    static  vector<Product> loadProducts(const  string& filename) {
         vector<Product> products;
         ifstream file(filename);
         string line;

        while ( getline(file, line)) {
             istringstream ss(line);
             string name, price, warranty, properties;

             getline(ss, name, ',');
             getline(ss, price, ',');
             getline(ss, warranty, ',');
             getline(ss, properties);

            products.emplace_back(name, price, warranty, properties);
        }
        return products;
    }

    // Method to display product details
    void display() const {
         cout << "Product Name: " << name << "\nPrice: " << price
                  << "\nWarranty: " << warranty << "\nProperties: " << properties << "\n";
    }

    // Getter for product name
     string getName() const { return name; }
};

int main() {
    // Load products from file
     vector<Product> products = Product::loadProducts("products.txt");

    // Ask user for the product name
     string userProduct;
     cout << "Enter product name: "<<endl;
     cout << "Write (Product1) for Product1"<< endl;
     cout << "Write (Product2) for Product2"<< endl;
     cout << "Write (Product3) for Product3"<< endl;


     getline( cin, userProduct);

    // Search for the product
    bool found = false;
    for (const auto& product : products) {
        if (product.getName() == userProduct) {
            product.display();
            found = true;
            break;
        }
    }

    if (!found) {
         cout << "Product not found.\n";
    }

    return 0;
}
