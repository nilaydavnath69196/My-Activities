/*
NILAY DAV NATH
TOPIC - PROJECT FOR PRODUCT INFORMATION IN C++ (CALLING TEXT FILE)
DATE - 09/11/2024
DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING
*/

#include <iostream>
#include <fstream>
#include <string>
using namespace std;

class Product {
public:
    void displayProductInfo(); // Display existing product information
    void addProduct();         // Add a new product to the file
};

void Product::displayProductInfo() {
    int productCode;
    char anotherProduct = 'y';
    cout << "Hello Sir! Welcome to my project." << endl;

    while (anotherProduct == 'y') {
        // Display product code list
        cout << "\nHere is the product code list: " << endl;
        cout << " 100 for CPU\n 101 for Motherboard\n 102 for Memory\n 103 for SSD\n 104 for RAM\n";
        cout << " 105 for HDD\n 107 for Monitor\n 108 for Graphics Card\n 109 for Mouse\n";
        cout << " 110 for Keyboard\n 111 for Printer\n 112 for Projector\n 113 for WiFi Router\n";

        cout << "Please enter the product code to display information: ";
        cin >> productCode;

        ifstream file("products.txt");
        string line;
        bool productFound = false;

        if (file.is_open()) {
            while (getline(file, line)) {
                if (line == "Code: " + to_string(productCode)) {
                    productFound = true;
                    cout << "\nProduct Found:\n" << line << endl;
                    while (getline(file, line) && !line.empty()) {
                        cout << line << endl;
                    }
                    break;
                }
            }
            file.close();

            if (!productFound) {
                cout << "Product with code " << productCode << " not found." << endl;
            }
        } else {
            cerr << "Unable to open file!" << endl;
        }

        cout << "\nDo you want to see another product's information? ";
        cout << "Press 'y' for yes and 'n' for no: ";
        cin >> anotherProduct;
    }
    cout << "THANK YOU!" << endl;
}

void Product::addProduct() {
    ofstream file("products.txt", ios::app); // Open file in append mode
    if (!file) {
        cerr << "Error: Could not open the file!" << endl;
        return;
    }

    int code;
    string name, description;
    double price;

    cout << "\nEnter product details to add:\n";
    cout << "Product Code: ";
    cin >> code;
    cin.ignore(); // To ignore the newline character after code input
    cout << "Product Name: ";
    getline(cin, name);
    cout << "Price: $";
    cin >> price;
    cin.ignore();
    cout << "Description: ";
    getline(cin, description);

    // Append the new product information to the file
    file << "Code: " << code << endl;
    file << "Name: " << name << endl;
    file << "Price: $" << price << endl;
    file << "Description: " << description << endl;
    file << endl;

    file.close();
    cout << "Product added successfully!\n";
}

int main() {
    Product obj;
    int choice;

    do {
        cout << "\n--- PRODUCT INFORMATION SYSTEM ---\n";
        cout << "1. Display Product Information\n";
        cout << "2. Add New Product\n";
        cout << "3. Exit\n";
        cout << "Enter your choice: ";
        cin >> choice;

        switch (choice) {
            case 1:
                obj.displayProductInfo();
                break;
            case 2:
                obj.addProduct();
                break;
            case 3:
                cout << "Exiting... Thank you!" << endl;
                break;
            default:
                cout << "Invalid choice. Please try again.\n";
        }
    } while (choice != 3);

    return 0;
}

