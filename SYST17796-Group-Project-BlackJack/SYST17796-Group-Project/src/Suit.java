
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Random;

public enum Suit {
    DIAMONDS,
    CLUBS,
    HEARTS,
    SPADES;
    
    private static final ArrayList<Suit> SUITS = 
        new ArrayList<Suit>(Arrays.asList(Suit.values()));
    private static final int SIZE = SUITS.size();
    private static final Random RANDOM = new Random();
    
    public static Suit randomSuit() {
        return SUITS.get(RANDOM.nextInt(SIZE));
    }
}
