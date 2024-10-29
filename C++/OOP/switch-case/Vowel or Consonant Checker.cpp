/*
TOPIC: C++ - Vowel or Consonant Checker
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE : 10/28/2024
*/
#include<iostream>
using namespace std;
class vowel_consunant
{
public:
    void display();
};
void vowel_consunant::display()
{
    char ch;
    cout << "Enter a character: ";
    cin >> ch;

    switch(ch) {
        case 'a':
        case 'e':
        case 'i':
        case 'o':
        case 'u':
        case 'A':
        case 'E':
        case 'I':
        case 'O':
        case 'U':
            cout << ch << " is a vowel." << endl;
            break;
        default:
            cout << ch << " is a consonant." << endl;
    }
}

int main()
{

    vowel_consunant obj;
    obj.display();
    return 0;
}
