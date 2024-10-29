/*
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC - TO CHECK THE NUMBER IS POSITIVE OR NEGATIVE
DATE: 10/28/2024
*/

#include<iostream>
using namespace std;
class number_check
{
public:
    void display();
};
void number_check::display()
{

    int number;

  cout << "Enter an integer: ";
  cin >> number;

  if (number >= 0) {
    cout << "You entered a positive integer: " << number << endl;
  }
  else {
    cout << "You entered a negative integer: " << number << endl;
  }

}
main()
{
    number_check obj;
    obj.display();
    return 0;

}
