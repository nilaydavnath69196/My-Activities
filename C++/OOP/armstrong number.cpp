/*
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC: ARMSTRONG NUMBER
DATE :06/10/2024
*/
#include<iostream>
using namespace std;
class armstrong
{

public:
    void display();
};
void armstrong::display()
{
    int num,temp,r,sum=0;
    cout <<"Enter a nunber: ";
    cin>>num;
    temp = num;
    while(temp != 0)
    {
        r = temp % 10;
    sum = sum + r * r * r; // Calculate the sum of the cubes of its digits
    temp = temp / 10;

    }
    if(sum == num)
    {

        cout <<num<<" is a armstrong number";
    }
    else{
        cout <<num<<" not armstrong number";
    }

}
int main()
{
    armstrong obj;
    obj.display();
}
