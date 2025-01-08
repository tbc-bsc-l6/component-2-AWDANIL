using BOOSE;

namespace Component_1
{
    /// <summary>
    /// Represents a custom implementation of the BOOSE "int" command with no variable limit.
    /// </summary>
    public class CustomInt : Int
    {
        public CustomInt() : base()
        {
        }

        /// <summary>
        /// Overrides the Restrictions method to bypass variable limit checks.
        /// </summary>
        public override void Restrictions()
        {
            // No restrictions applied.
            // You can extend this logic if needed (e.g., dynamically increasing limits).
        }
    }
}
