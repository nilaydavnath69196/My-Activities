#include <iostream>
using namespace std;

class BearAndBrother {
public:
    void calculateYears();
};
void BearAndBrother::calculateYears()
{
        int a, b;
        cin >> a >> b;

        int years = 0;
        while (a <= b) {
            a *= 3;
            b *= 2;
            years++;
        }

        cout << years << endl;
    }
int main() {
    BearAndBrother bb;
    bb.calculateYears();
    return 0;
}
