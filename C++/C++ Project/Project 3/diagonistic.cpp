/*
NILAY DAV NATH
TOPIC - PROJECT For DiagnosticTest  (USING TEXT FILE)
DATE - 12/12/2024
DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING
*/
#include <iostream>
#include <fstream>
#include <vector>
#include <sstream>
#include <algorithm>
using namespace std;

class DiagnosticTest {
private:
    string testName;
    double testPrice;
    int roomNumber;
    string description;

public:

    DiagnosticTest(string name, double price, int room, string desc)
        : testName(name), testPrice(price), roomNumber(room), description(desc) {}

    string getTestName() const {
        return testName;
    }

    void displayDetails() const {
        cout << "----------------------------------------" << endl;
        cout << "Test Name        : " << testName << endl;
        cout << "Test Price       : $" << testPrice << endl;
        cout << "Room Number      : " << roomNumber << endl;
        cout << "Description      : " << description << endl;
    }
};

vector<DiagnosticTest> loadTestData(const string& filename) {
    vector<DiagnosticTest> tests;
    ifstream file(filename);

    if (!file) {
        cerr << "Error: Unable to open file " << filename << endl;
        return tests;
    }

    string line;
    while (getline(file, line)) {
        stringstream ss(line);
        string name, desc;
        double price;
        int room;

        getline(ss, name, ',');
        ss >> price;
        ss.ignore();
        ss >> room;
        ss.ignore();
        getline(ss, desc);

        tests.emplace_back(name, price, room, desc);
    }

    file.close();
    return tests;
}

int main() {
    const string filename = "tests.txt";

    vector<DiagnosticTest> tests = loadTestData(filename);

    if (tests.empty()) {
        cout << "No test data available." << endl;
        return 0;
    }

    cout << "Available Tests:" << endl;
    for (const auto& test : tests) {
        cout << "- " << test.getTestName() << endl;
    }

    string userInput;
    cout << "\nEnter the test name to view details: ";
    getline(cin, userInput);

    auto it = find_if(tests.begin(), tests.end(),
                      [&userInput](const DiagnosticTest& test) {
                          return test.getTestName() == userInput;
                      });

    if (it != tests.end()) {
        it->displayDetails();
    } else {
        cout << "Test not found. Please check the test name and try again." << endl;
    }

    return 0;
}
