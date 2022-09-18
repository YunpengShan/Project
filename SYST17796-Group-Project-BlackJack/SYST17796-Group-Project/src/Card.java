/**
 * SYST 17796 Project Base code.
 * Students can modify and extend to implement their game.
 * Add your name as an author and the date!
 */

/**
 * A class to be used as the base Card class for the project. Must be general enough to be instantiated for any Card
 * game. Students wishing to add to the code should remember to add themselves as a modifier.
 *
 * @author dancye
 */
public class Card {
    //default modifier for child classes
    private Value value;
    private Suit suit;
    private int numValue;
    
    public Card(Value value, Suit suit){
        this.value = value;
        this.suit = suit;
    }

    public int getNumValue() {
        switch (value) {
            case ACE:
                this.numValue = 11;
                break;
            case TWO:
                this.numValue = 2;
                break;
            case THREE:
                this.numValue = 3;
                break;
            case FOUR:
                this.numValue = 4;
                break;
            case FIVE:
                this.numValue = 5;
                break;
            case SIX:
                this.numValue = 6;
                break;
            case SEVEN:
                this.numValue = 7;
                break;
            case EIGHT:
                this.numValue = 8;
                break;
            case NINE:
                this.numValue = 9;
                break;
            default:
                this.numValue = 10;
                break;
        }
        return numValue;
    }

    public Suit getSuit() {
        return suit;

    }

    public void setSuit(Suit suit) {
        this.suit = suit;

    }

    public Value getValue() {
        return value;
    }

    public void setValue(Value value) {
        this.value = value;
    }

    public String toString() {
        return "Value: " + getValue() + " Suit: " + getSuit()+",";
    }
 
 

}
