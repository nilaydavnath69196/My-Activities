/*
NILAY DAV NATH
TOPIC - PROJECT FOR PRODUCT INFORMATION IN C++ (USING TEXT FILE)
DATE - 09/11/2024
DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING
*/

#include <iostream>
#include <fstream>
#include <string>
#include <iomanip>
using namespace std;

class Product {
public:
    void displayProductInfo();
    void addProductInfo();
};

void Product::displayProductInfo() {
    int productCode;
    char anotherProduct = 'y';


    cout << "=== Product Information ===" << endl;
    cout << "" << endl;

    while (anotherProduct == 'y') {
        // Display the list of product codes
        cout << "Here is the product code list: " << endl;
        cout << " 100 for CPU" << endl;
        cout << " 101 for Motherboard" << endl;
        cout << " 102 for Memory" << endl;
        cout << " 103 for SSD" << endl;
        cout << " 104 for RAM" << endl;
        cout << " 105 for HDD" << endl;
        cout << " 107 for Monitor" << endl;
        cout << " 108 for Graphics Card" << endl;
        cout << " 109 for Mouse" << endl;
        cout << " 110 for Keyboard" << endl;
        cout << " 111 for Printer" << endl;
        cout << " 112 for Projector" << endl;
        cout << " 113 for WiFi Router" << endl;

        // User input for product code
        cout << "Please Sir, enter product code to display information: ";
        cin >> productCode;

        ifstream file("products.txt");
        string line;
        bool productFound = false;

        if (file.is_open()) {
            while (getline(file, line)) {
                if (line == "Code: " + to_string(productCode)) {
                    productFound = true;
                    cout << "\n--- Product Details ---" << endl;
                    cout << line << endl;
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

        cout << "\nDo you want to see other products' information? (y/n): ";
        cin >> anotherProduct;
    }
    cout << "THANK YOU!" << endl;
       cout << "----------------------------------------" << endl;
}

void Product::addProductInfo() {
    ofstream file("products.txt", ios::app);
    if (!file.is_open()) {
        cerr << "Unable to open file!" << endl;
        return;
    }

    char anotherProduct = 'y';
    while (anotherProduct == 'y') {
        int productCode;
        string productName, productDetails;

        cout << "\n--- Add New Product ---" << endl;
        cout << "Enter product code: ";
        cin >> productCode;
        cin.ignore(); // Ignore newline character left in the buffer
        cout << "Enter product name: ";
        getline(cin, productName);
        cout << "Enter product details: ";
        getline(cin, productDetails);

        // Write to the file
        file << "Code: " << productCode << endl;
        file << "Name: " << productName << endl;
        file << "Details: " << productDetails << endl;
        file << endl;

        cout << "\nDo you want to add another product? (y/n): ";
        cin >> anotherProduct;
    }

    file.close();
    cout << "Product information added successfully!" << endl;
}

int main() {
    Product obj;
    int choice;

    do {
        cout <<"<<<<------------------------------>>>" << endl;
        cout << "=== Hello Sir! Welcome To My Project ===" << endl;
        cout << "=== PRODUCT INFORMATION SYSTEM ===" << endl;
        cout << "1. Display Product Information" << endl;
        cout << "2. Add New Product Information" << endl;
        cout << "3. Exit" << endl;
            cout <<"------------------------------" << endl;

        cout << "Please Enter your choice: ";
        cin >> choice;

        switch (choice) {
            case 1:
                obj.displayProductInfo();
                break;
            case 2:
                obj.addProductInfo();
                break;
            case 3:
                cout << "Exiting... Thank you!" << endl;
                break;
            default:
                cout << "Invalid choice. Please try again." << endl;
        }
    } while (choice != 3);

    return 0;
}
