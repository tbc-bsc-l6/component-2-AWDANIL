using BOOSE;

namespace Component_1
{
    /// <summary>
    /// Custom implementation of the BOOSE Real type to handle floating-point variables.
    /// </summary>
    public class CustomReal : Real
    {
        public CustomReal() : base()
        {
        }

        /// <summary>
        /// Override restrictions to bypass the variable limit for real variables.
        /// </summary>
        public override void Restrictions()
        {
            // Do nothing to bypass the limit.
        }

        /// <summary>
        /// Override Execute to add additional validation if needed.
        /// </summary>
        public override void Execute()
        {
            try
            {
                base.Execute();
            }
            catch (StoredProgramException ex)
            {
                throw new CommandException($"Failed to process real variable: {ex.Message}");
            }
        }
    }
}
