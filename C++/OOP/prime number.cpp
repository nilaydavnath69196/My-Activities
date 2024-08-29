/*
    NILAY DAV NATH
    C++ - PRIME NUMBER
    DATE: 30/08/2024
    */
#include<iostream>
using namespace std;
class number
{
    public:
    void result();
};
void number::result()
{
    int n,i,count;
    cout <<"Enter a number: ";
    cin>>n;

    for(i=2;i<n;i++)
{if(n%i==0)
{
    count++;
    break;
}
}
if(count==0){
    cout <<n<<" is a prime number";
}
else {
        cout <<n<<" is not a prime number";
}

}
main()
{
    number obj;
    obj.result();
    return 0;
}
