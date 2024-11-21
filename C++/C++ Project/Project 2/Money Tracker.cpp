#include <iostream>
#include <fstream>
#include <string>
using namespace std;

void addTransaction() {
    ofstream file("money_tracker.txt", ios::app); // Open file to append
    if (!file) {
        cout << "Error: Cannot open file!" << endl;
        return;
    }

    string type, description;
    double amount;

    cout << "Enter type (income/expense): ";
    cin >> type;
    cout << "Enter amount: $";
    cin >> amount;
    cin.ignore(); // Ignore leftover newline
    cout << "Enter description: ";
    getline(cin, description);

    file << type << " " << amount << " " << description << endl;
    file.close();
    cout << "Transaction added successfully!" << endl;
}

void displayTransactions() {
    ifstream file("money_tracker.txt"); // Open file to read
    if (!file) {
        cout << "Error: Cannot open file!" << endl;
        return;
    }

    string type, description;
    double amount;

    cout << "\n--- Transaction History ---" << endl;
    while (file >> type >> amount) {
        file.ignore(); // Ignore space
        getline(file, description);
        cout << type << ": $" << amount << " (" << description << ")" << endl;
    }
    file.close();
}

void calculateBalance() {
    ifstream file("money_tracker.txt"); // Open file to read
    if (!file) {
        cout << "Error: Cannot open file!" << endl;
        return;
    }

    string type;
    double amount, balance = 0.0;

    while (file >> type >> amount) {
        if (type == "income") {
            balance += amount;
        } else if (type == "expense") {
            balance -= amount;
        }
    }
    file.close();
    cout << "Current Balance: $" << balance << endl;
}

int main() {
    int choice;

    do {
        cout << "\n--- University Money Tracker ---" << endl;
        cout << "1. Add Transaction" << endl;
        cout << "2. Display Transactions" << endl;
        cout << "3. Calculate Balance" << endl;
        cout << "4. Exit" << endl;
        cout << "Enter your choice: ";
        cin >> choice;

        if (choice == 1) {
            addTransaction();
        } else if (choice == 2) {
            displayTransactions();
        } else if (choice == 3) {
            calculateBalance();
        } else if (choice == 4) {
            cout << "Exiting... Thank you!" << endl;
        } else {
            cout << "Invalid choice! Please try again." << endl;
        }
    } while (choice != 4);

    return 0;
}
