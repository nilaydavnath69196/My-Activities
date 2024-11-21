/*
NILAY DAV NATH
TOPIC - PROJECT FOR PRODUCT INFORMATION IN C++ (USING TEXT FILE)
DATE - 09/11/2024
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
*/
#include <iostream>
#include <fstream>
#include <string>
using namespace std;

class Product {
public:
    void displayProductInfo();
};

void Product::displayProductInfo() {
    int productCode;
    char anotherProduct = 'y';

    while (anotherProduct == 'y') {
        // Display product code list
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
        cout << "Now Enter product code to display information: ";
        cin >> productCode;

        ifstream file("products.txt");
        string line;
        bool productFound = false;

        if (file.is_open()) {
            while (getline(file, line)) {
                if (line == "Code: " + to_string(productCode)) {
                    productFound = true;
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

        cout << "Do you want to see other products' information? ";
        cout << "Press 'y' for yes and 'n' for no: ";
        cin >> anotherProduct;
    }
    cout << "THANK YOU!" << endl;
}

int main() {
    Product obj;
    obj.displayProductInfo();

    return 0;
}

