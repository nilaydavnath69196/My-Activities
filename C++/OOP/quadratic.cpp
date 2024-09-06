/*
TOPIC - C++ - TO FIND QUADRATIC EQUATION
NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE - 09/06/2024
*/
#include<iostream>
#include<math.h>
using namespace std;
class quadratic{
public:
void display();
};
void quadratic::display()
{
    double a,b,c,discriminate,root1,root2,real,imaginary;
    cout<<"Enter a, b, c: ";
    cin>>a>>b>>c;
    discriminate = b*b - 4*a*c;
    if(discriminate > 0){
        root1 = (-b + sqrt(discriminate)) / 2*a;
        root2 = (-b - sqrt(discriminate)) / 2*a;
        cout << "Root1 = " << root1 << endl;
        cout << "Root2 = " << root2 << endl;

    }
    else if(discriminate == 0){
        root1 = root2 = -b/(2*a);
        cout << "Root1 = " << root1 << endl;
        cout << "Root2 = " << root2 << endl;
    }
    else{
        real = -b/(2*a);
        imaginary = sqrt(-discriminate)/(2*a);
        cout <<"Root1 = " <<real<<imaginary <<endl;
        cout <<"Root2 = " << real <<imaginary <<endl;

    }

}
int main(){
quadratic obj;
obj.display();
}

