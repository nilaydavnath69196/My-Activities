/*
NILAY DAV NATH
DPERTMENT OF COMPUTER SCIENCE AND ENGINNERING
C++ - TO CHECK VOWEL OR CONSUNANT
DATE - 28/09/2024
*/
#include <iostream>
using namespace std;

class Character {
public:
    void display();
};

void Character::display() {
    char ch;
    cout << "Enter any char: ";
    cin >> ch;

    switch(ch) {
        case 'A': case 'E': case 'I': case 'O': case 'U':
        case 'a': case 'e': case 'i': case 'o': case 'u':
            cout << "vowel" << endl;
            break;
        default:
            cout << "consonant" << endl;
    }
}

int main() {
    Character obj;
    obj.display();
    return 0;
}
