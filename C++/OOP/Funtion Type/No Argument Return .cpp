#include <iostream>
using namespace std;

class Sum {
public:
    void calculateSum();
};
void Sum::calculateSum()
{
        int a = 5, b = 3;
        cout << "Sum: " << a + b << endl;
    }
int main() {
    Sum obj;
    obj.calculateSum();
    return 0;
}

